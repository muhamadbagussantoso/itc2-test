$(".swiper-slide--content .content .title").text(function(index, currentText) {     
  if (currentText.length >= 50) {
  	return currentText.substr(0, 50)+'...';
  }   
});

$(".swiper-slide--content .content > .desc").text(function(index, currentText) {     
  if (currentText.length >= 80) {
  	return currentText.substr(0, 80)+'...';
  }   
});

if (screen.width < 767) {
    $(".home-news--row .content > .desc").text(function(index, currentText) {
      return currentText.substr(0, 35)+'...';
    });
    $(".news-right .content > .desc").text(function(index, currentText) {
      return currentText.substr(0, 35)+'...';
    });  
}
