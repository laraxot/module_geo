function popupcontent(feature, layer) {
	var customPopup = `
			<img class="wwone__map-infobox__thumb" src="##img_src##" />
			<div class="wwone__map-infobox__badge">##distance## Km</div>
			<div class="wwone__map-infobox__inner">
				<div class="wwone__map-infobox__inner__heading">##title##</div>
				<div class="wwone__map-infobox__inner__location">##subtitle##</div>
				<div class="wwone__map-infobox__inner__info">
					<div class="wwone__map-infobox__inner__info__type"><i class="fa fa-cutlery" aria-hidden="true"></i> ##cuisineCat_list##</div>
					
				</div>
				<a class="wwone__map-infobox__inner__btn btn" href="##url##" target="_blank">View &raquo;</a>
			</div>`;
	return customPopup; 
}