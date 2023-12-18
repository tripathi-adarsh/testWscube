(function() {
	var masonryContainer,masonryContainerFromTop, masonryContainerFromLeft, masonryContainerWidth, masonryColumns, elements;
	
	masonryContainer = container;

	if (document.readyState === "complete") {
		document.addEventListener("DOMContentLoaded", onImagesLoaded);
	} else {
		onImagesLoaded(masonryContainer, function() {
			setMasonry(masonryContainer);
		});
	}

	function onImagesLoaded(container, event) {
		var images = container.getElementsByTagName("img");
		var loaded = images.length;
		for (var i = 0; i < images.length; i++) {
			if (images[i].complete) {
				loaded--;
			}
			else {
				images[i].addEventListener("load", function() {
					loaded--;
					if (loaded == 0) {
						event();
					}
				});
			}
			if (loaded == 0) {
				event();
			}
		}
	}

	function setMasonry(masonryContainer) {
		masonryContainerWidth=masonryContainer.offsetWidth;
		masonryContainerFromTop=masonryContainer.offsetTop;
		masonryContainerFromLeft=masonryContainer.offsetLeft;
		elements=masonryContainer.querySelectorAll('.item');
		var len=elements.length;
		var computed,masonryItemWidth, masonryItemHeight=[], masonryItemPadding,masonryItemMargin, masonryItemNewHeight=[], masonryItemPositionLeft=[],masonryItemPositionTop=[];
		for (var i = 0; i < len; i++) {
			computed=window.getComputedStyle(elements[i], null);
			masonryItemPadding= computed.getPropertyValue('padding-left');			
			masonryItemMargin= computed.getPropertyValue('margin');
			masonryItemWidth=elements[i].offsetWidth;
			masonryItemHeight[i]=elements[i].querySelector('img').offsetHeight;
		}
		var masonryColumns=masonryContainerWidth/masonryItemWidth;	
		for (var i = 0; i < len; i++) {
			elements[i].style.marginBottom = parseInt(masonryItemPadding)*2+"px";
			elements[i].style.height = masonryItemHeight[i]+"px";
			masonryItemNewHeight[i]=masonryItemHeight[i]+parseInt(masonryItemPadding)*2;
			var d=Math.floor(i/masonryColumns);
			var r=i%masonryColumns;
			if(i < masonryColumns){
				masonryItemPositionLeft[i]=masonryContainerFromLeft + (i * masonryItemWidth);
				masonryItemPositionTop[i]=masonryContainerFromTop;
			}else{
				masonryItemPositionLeft[i]=masonryContainerFromLeft +(r * masonryItemWidth);
				var tmp=0,pos;				
				for(var j=0; j<d; j++){
					pos=+(j*masonryColumns) +r;
					tmp+=masonryItemNewHeight[pos];
				}
				masonryItemPositionTop[i]=masonryContainerFromTop + tmp;
			}
		}
		
		for (var i = 0; i < len; i++) {
			elements[i].style.width = masonryItemWidth+"px";
			elements[i].style.position = "absolute";
			elements[i].style.top = masonryItemPositionTop[i]+"px";
			elements[i].style.left = masonryItemPositionLeft[i]+"px";
		}
	}
})();
