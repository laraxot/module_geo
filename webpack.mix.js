const mix = require('laravel-mix');

mix.options({
 	purifyCss: false,
 });

 mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'], // more than one
    tether: ['window.Tether', 'Tether'],
	'tether-shepherd': ['Shepherd'],
	'popper.js/dist/popper.js': ['Popper'],
  	sweetalert2:['Swal'],
  	'magnific-popup':['magnificPopup'],
    moment: 'moment', // only one
    axios: 'axios',
    leaflet: ['leaflet','L']
});


require('laravel-mix-merge-manifest');

//mix.setPublicPath('../../public').mergeManifest();
var src=__dirname + '/Resources';
var dest= 'Resources/views'

mix.js(src+'/js/app.js', dest+'/js/geo.js')
    .sass( src + '/sass/app.scss', dest+'/css/geo.css')
    .setResourceRoot('../')
	.setPublicPath(dest);

if (mix.inProduction()) {
    mix.version();
}