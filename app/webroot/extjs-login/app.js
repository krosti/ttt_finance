var strings = {};
strings.nl = {
	"_Username": "Gebruikersnaam" 
};
strings.en = {
	"_Username": "Username" 
};

String.prototype.l = function() {
	console.log('name: '+Ext.app.Application.name);
	var lang = 'en';
	var result = this;
	if (strings[lang] && strings[lang][this]) result = strings[lang][this];
	return result;
};

Ext.Loader.setConfig({
		enabled: true,
		paths: { 'LM': 'extjs-login/app' }
});

Ext.require('LM.view.LoginWindow');
Ext.require('LM.view.UserChart');

Ext.application({
		name: 'LM',

		appFolder: 'extjs-login/app',

		controllers: [
				'LoginController'
		],
		
		launch: function() {
			Ext.create('LM.view.Main', {});
			Ext.create('LM.view.LoginWindow', {}).show();
			/*Ext.create('Ext.container.Viewport', {
					width: 200,
					//height: 300,
					frame: true,
					renderTo: 'login',
					layout: 'border',
					items: [
						{
					        region: 'north',
					        html: '<h1 class="x-panel-header">APP</h1>',
					        border: false,
					        margins: '0 0 5 0'
					    },
						{
							region: 'south',
							xtype: 'mainview',
						}
					]
			});*/
			Ext.create('LM.view.UserChart', {}).show();
		},
		autoCreateViewport: false
});