$(".description .desc").text(function(index, currentText) {     
  if (currentText.length >= 100) {
  	return currentText.substr(0, 100)+'...';
  }   
});