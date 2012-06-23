Ext.require('LM.view.Main');

Ext.define('LM.view.Viewport', {
    extend: 'Ext.container.Viewport',
	width: 400,
	autoHeight: true,
	frame: true,
	//renderTo: 'login',
    items: [
        {
          xtype: 'mainview',
        }
    ],
});