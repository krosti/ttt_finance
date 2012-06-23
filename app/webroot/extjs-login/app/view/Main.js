//Ext.require("LM.view.UserChart");

Ext.define('LM.view.Main', {
	extend: 'Ext.panel.Panel',
	renderTo: 'login',
	//width:300,
	autoHeight: true,
	frame: true,
	alias: 'widget.mainview',
	title: "User Options/Statistics",

	activeItem: 0,
	defaults: {
			// applied to each contained panel
			border:false
	},
	layout: 'card',
			
	items: [
		{
			id: 'card0',
			width: 200,
			autoHeight: true,
			html: ''
		},
		{
			id: 'card1',
			width: 200,
			autoHeight: true,
			xtype: 'panel',
			items: [
				{
					xtype: 'button',
					text: 'logout',
					action: 'logout'
				}
			]
		},
		{
			xtype: ''
		}
	],
	tools:[{
		type:'refresh',
		tooltip: 'Refresh form Data',
		// hidden:true,
		handler: function(event, toolEl, panel){
			// refresh logic
		}
	},
	{
		type:'help',
		tooltip: 'Get Help',
		handler: function(event, toolEl, panel){
			// show help here
		}
	}],

	initComponent: function() {
		this.callParent(arguments);
	},
});