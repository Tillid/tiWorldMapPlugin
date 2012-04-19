#tiWorldMapPlugin (for Symfony 1.4)#

The _tiWorldMapPlugin_ allows you to include a world map in your web page and to easily display some data on it. All country names are available in two languages : English and French. The plugin also provides lots of options to help you personalize the way it renders.
This plugin relies on jquery, so you will also need jquery.

##Installation##

* Installation via package system

		symfony plugin:install tiWorldMapPlugin

* Installation via a git checkout

		git clone git://github.com/Tillid/tiWorldMapPlugin.git plugins/tiWorldMapPlugin
		
* Plugin activation in the file _config/ProjectConfiguration.class.php_

		[php]
		class ProjectConfiguration extends sfProjectConfiguration
		{
			public function setup()
			{
				$this->enablePlugins(array(
				'sfDoctrinePlugin', 
				'tiWorldMapPlugin',
				'...'
				));
			}
		}
		
* Rebuild your model, update your database tables by startng from scratch and load the fixtures (it will delete all the existing tables, then re-create them)

		symfony doctrine:build --all --and-load --no-confirmation

* Enable the _tiWorldMapPlugin_ in your _settings.yml_

        all:
			.settings:
            enabled_modules:      [default, tiWorldMapPlugin]

* Publish the plugin assets

		symfony plugin:publish-assets

* Clear your cache

		symfony cc
		
##How to use##

###Including the worldmap in a symfony template###

To use the _tiWorldMapPlugin_, you have to include the worldmap in your page with include_component

	[php]
	include_component('tiWorldMap', 'worldmap', array());

###Options###

You can use several options by putting them in the third argument array. These possible options are:

* _width_ : sets the width of the worldmap (default value: 500px)

* _height_ : sets the height of the worldmap (default value: 300px)

* _class_ : sets a css class to the worldmap  (default value: tiWorldMapPlugin_map)

* _backgroundColor_ : sets the worldmap background color (default value: #808080)

* _color_ : sets the normal color of the countries (default value: #FFFFFF)

* _hoverColor_ : sets the color of the countries under the mouse pointer (default value: #000000)

* _scaleColorStart_ : sets the starting scaling color when representing data with color gradient (default value: #FFFFFF)

* _scaleColorEnd_ : sets the ending scaling color when representing data with color gradient (default value: #FF0000)

* _normalizeFunction_ : sets the function used to calculate color when representing data with color gradient (default value: linear, possible values: linear/polynomial)

* _zoomStep_ : sets the zoom coefficient (default value: 1.4)

* _zoomMaxStep_ : sets the number of time you can zoom in (default value: 4)

* _zoomCurStep_ : sets the current zoom step (default value: 1)

* _onLabelShow_ : allows you to call a javascript function just before a country label is shown. Received parameters: event, label, code.

* _onRegionOver_ : allows you to call a javascript function when the mouse pointer enters a country region. Received parameters: event, code.

* _onRegionOut_ : allows you to call a javascript function when the mouse pointer leaves a country region. Received parameters: event, code.

* _onRegionClick_ : allows you to call a javascript function when a country is clicked. Received parameters: event, code.

All these options can also be specified in the _app.yml_ file of your application. The option names are just all in lowercase and prefixed with _tiworldmapplugin_. Example: 

		all:
			tiworldmapplugin_width: 1000px
			tiworldmapplugin_height: 600px
			
It is also the same as:

		all:
			tiworldmapplugin:
				width: 1000px
				height: 600px
				
If an option is set with both method, the option passed directly through include_component in taken.

###Data visualization###

The _tiWorldMapPlugin_ provides you with two way of visualize data:

1. Setting directly the country color: you can specify for each country the color you want. This is done by passing an array _colors_ which associates the country code with the desired color.

2. Using a color gradient to represent data variations. This is done by passing an array _values_ which associates the country code with the data value to represent.

##Miscellaneous##

* The list of the countries with their code can be found in the file _modules/templates/_worldmapjs.php_

* You can use the javascript function _getNameFromCode_ to get the full country name from the country code