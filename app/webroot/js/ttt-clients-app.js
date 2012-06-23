Ext.onReady(function() {
    
    /*Ext.create('Ext.button.Button',{
        text: "TEST",
        renderTo: Ext.getBody()
    });*/

    // load dependencies
    Ext.require([
        'Ext.data.*',
        'Ext.form.field.Text',
        'Ext.button.Button'
    ]);

    // init Bancha
    Bancha.init();
    
    // when Bancha is ready, the model meta data is loaded
    // from the server and the model is created....
    loadUsersWithBancha();

}); //eo onReady

// eof