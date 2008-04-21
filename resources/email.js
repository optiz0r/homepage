
window.onload = function() {
	for (var imgs = document.getElementsByTagName('img'),i=0,l=imgs.length; i<l; i++) {
		if (/at\.png$/.exec(imgs[i].src) ) {
			imgs[i].parentNode.insertBefore(document.createTextNode('@'),imgs[i]);
			imgs[i].parentNode.removeChild(imgs[i]);
		}
	}
}