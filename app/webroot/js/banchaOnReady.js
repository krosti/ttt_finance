function loadUsersWithBancha(){
    Bancha.onModelReady(['Article','User'], function() {


        /**
         * Example 1
         * A Bancha Store which provides full CRUD support
         */
         
        var store = Ext.create('Ext.data.Store', {
            model: Bancha.getModel('User'), // yes, that's all you have to do 
            autoLoad: true                  // (proxy, fields. etc. is already configured)
        });
        //console.log(store);

        // create a full featured users grid (just normal ExtJS code)
        var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 2
        });
        Ext.create('Ext.grid.Panel', {
            title: 'Usuarios Activos',
          
            // grid configs
            store: store,
            columns: Ext.clone(Example.User.gridColumnsWithCrud),
            
            // enable editing
            selType: 'cellmodel',
            plugins: [cellEditing],
            
            // add buttons
            dockedItems: [{
                xtype: 'toolbar',
                dock: 'bottom',
                ui: 'footer',
                items: [
                    '->',
                    {
                        iconCls: 'icon-add',
                        text: 'Create',
                        scope: {
                            cellEditing: cellEditing,
                            store      : store
                        },
                        handler: Example.Grid.onCreate
                    }, {
                        iconCls: 'icon-reset',
                        text: 'Reset',
                        scope: store,
                        handler: Example.Grid.onReset
                    }, {
                        iconCls: 'icon-save',
                        text: 'Save',
                        formBind: true,
                        scope: store,
                        handler: Example.Grid.onSave
                    }
                ]
            }],
            tools:[{
                type:'refresh',
                tooltip: 'Refresh form Data',
                // hidden:true,
                handler: function(event, toolEl, panel){
                    //loadUsersWithBancha();
                }
            }],
            
            // some additional styles
            height: 350,
            //width: 650,
            frame: true,
            collapsible: true,
            collapsed: true,
            renderTo: 'gridpanel'
        });

    });

    /**
     * This object provides some basic ExtJS code
     * to make the sample above cleaner and more 
     * focused on the important parts
     */
    var Example = {};

    Example.Grid = {
        onCreate: function() { // scope is a config object
            var edit = this.cellEditing,
                grid = edit.grid,
                store = this.store,
                model = store.getProxy().getModel(),
                rec;
            
            // Cancel any active editing.
            edit.cancelEdit();
             
            // create new entry
            rec = Ext.create(Ext.ClassManager.getName(model),{});

            // add entry
            store.insert(0, rec);
            
            // start editing
            edit.startEditByPosition({
                row: 0,
                column: 0
            });
        },
        onSave: function() { // scope is the store
            var valid = true,
                msg = "",
                name,
                store = this;
            
            // check if all changes are valid
            store.each(function(el) {
                if(!el.isValid()) {
                    valid = false;
                    name = el.get('name') || el.get('title') || (el.phantom ? "New entry" : el.getId());
                    msg += "<br><br><b>"+name+":</b>";
                    el.validate().each(function(error) {
                        msg += "<br>&nbsp;&nbsp;&nbsp;"+error.field+" "+error.message;
                    });
                }
            });
            
            if(!valid) {
                Ext.MessageBox.show({
                    title: 'Invalid Data',
                    msg: '<div style="text-align:left; padding-left:50px;">There are errors in your data:'+msg+"</div>",
                    icon: Ext.MessageBox.ERROR,
                    buttons: Ext.Msg.OK
                });
            } else {
                // commit create and update
                store.sync();
            }
        },
        onDelete: function (grid, rowIndex, colIndex) {
            var store = grid.getStore(),
            rec = store.getAt(rowIndex),
            name = Ext.getClassName(rec);

            // instantly remove vom ui
            store.remove(rec);

            // sync to server
            // for before-ExtJS 4.1 the callbacks will be ignored, 
            // since they were added in 4.1
            store.sync({
                success: function(record,operation) {

                    Ext.MessageBox.show({
                        title: name + ' record deleted',
                        msg: name + ' record was successfully deleted.',
                        icon: Ext.MessageBox.INFO,
                        buttons: Ext.Msg.OK
                    });
                },
                failure: function(record,operation) {

                    // since it couldn't be deleted, add again
                    store.add(rec);

                    // inform user
                    Ext.MessageBox.show({
                        title: name + ' record could not be deleted',
                        msg: operation.getError() || (name + ' record could not be deleted.'),
                        icon: Ext.MessageBox.ERROR,
                        buttons: Ext.Msg.OK
                    });
                }
            }); //eo store sync
        },
        onReset: function() { // scope is the store
            // reject all changes
            var store = this;
            store.each(function(rec) {
                if (rec.modified) {
                    rec.reject();
                }
                if(rec.phantom) {
                    store.remove(rec);
                }
            });
        }
    };



    // for the user model
    Example.User = {
        formItems: [
            {
                xtype: "hiddenfield",
                allowDecimals: false,
                name: "id",
                fieldLabel: "Id"
            }, {
                xtype: "textfield",
                name: "name",
                fieldLabel: "Name"
            }, {
                xtype: "textfield",
                name: "login",
                fieldLabel: "Login"
            }, {
                xtype: "textfield",
                name: "email",
                fieldLabel: "Email",
                vtype: 'email'
            }, {
                xtype: 'fileuploadfield',
                name: "avatar",
                fieldLabel: "Avatar",
                
                buttonText: '',
                buttonConfig: {
                    iconCls: 'icon-upload'
                },
                vtype: 'fileExtension',
                validExtensions: ['gif', 'jpeg', 'png', 'jpg'],
                emptyText: 'Select an file'
            }, {
                xtype: 'component', 
                id: 'avatar-display-field',
                data: {},
                tpl: '<tpl if="avatar"><span class="uploaded-image">most recently uploaded image: {avatar}<image src="{avatar}" style="max-width: 400px; height:100px;" title="most recently uploaded image"></span></tpl>'
            }, {
                xtype: "numberfield",
                allowBlank: false,
                name: "weight",
                fieldLabel: "Weight"
            }, {
                xtype: "numberfield",
                allowBlank: false,
                allowDecimals: false,
                name: "height",
                fieldLabel: "Height"
            }
        ],
        gridColumns: [
            {
                flex: 1,
                xtype: "gridcolumn",
                text: "Name",
                dataIndex: "name",
                field: {
                    xtype: "textfield",
                    name: "name",
                    minLength: 3,
                    maxLength: 64
                }
            }, {
                flex: 1,
                xtype: "gridcolumn",
                text: "Login",
                dataIndex: "login",
                field: {
                    xtype: "textfield",
                    name: "login",
                    minLength: 3,
                    maxLength: 64
                }
            }, {
                flex: 1,
                xtype: "datecolumn",
                text: "Created",
                dataIndex: "created",
                field: {
                    xtype: "datefield",
                    name: "created"
                }
            }, {
                flex: 1,
                xtype: "gridcolumn",
                text: "Email",
                dataIndex: "email",
                field: {
                    xtype: "textfield",
                    name: "email",
                    vtype: "email",
                    allowBlank: false
                }
            }, {
                flex: 1,
                xtype: "numbercolumn",
                text: "Weight",
                dataIndex: "weight",
                field: {
                    xtype: "numberfield",
                    name: "weight",
                    minValue: 40
                }
            }, {
                flex: 1,
                xtype: "numbercolumn",
                format: "0",
                text: "Height",
                dataIndex: "height",
                field: {
                    xtype: "numberfield",
                    allowDecimals: false,
                    name: "height",
                    minValue: 100,
                    maxValue: 500
            }
            }
        ]
    };

    Example.User.gridColumnsWithCrud = Ext.clone(Example.User.gridColumns);
    Example.User.gridColumnsWithCrud.push({
        xtype: "actioncolumn",
        width: 50,
        items: [{
            icon: "img/icons/delete.png",
            tooltip: "Delete",
            handler: Example.Grid.onDelete
        }]
    });
}