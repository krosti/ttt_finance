Ext.require('Ext.base');

Ext.create('Ext.Button', {
    text: 'Click this me',
    renderTo: Ext.getBody(),
    handler: function() {
        alert('You clicked the button!')
    }
});