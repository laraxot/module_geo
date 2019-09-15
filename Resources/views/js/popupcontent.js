function popupcontent(feature, layer) {
	var customPopup = `
			<div class="card" style="width: 18rem;">
  <img src="##image_src##" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">##title##</h5>
    <p class="card-text">##subtitle##</p>
    
  </div>
  <div class="card-footer">
  	<a href="##url##" class="btn btn-primary"> &raquo; </a>
  </div>
</div>`;
	console.log(feature);
	for (var prop in feature) {
		customPopup = customPopup.replace('##' + prop + '##', feature[prop]);
	}
	return customPopup;
}