function beforeVideoEnds() {
  // The javascript code that is to be execute few seconds before the end of the video.
  // Mainly sets two thumbnail images to the right of the video and also provides links to the same.
  // Later port this into a a blob and load it it with a time tirgger.
  console.log("Calling before video ends function");
  document.getElementById("video_end_text").innerHTML = "You may be also interested in" ;
  document.getElementById("img_2").src = "sintel.jpg";
  document.getElementById("links_2").href = "https://www.youtube.com/watch?v=eRsGyueVLvQ";	  
  document.getElementById("link_1_end").innerHTML = "Watch here" ;

  document.getElementById("img_3").src = "bbb.png";
  document.getElementById("links_3").href = "https://www.youtube.com/watch?v=YE7VzlLtp-4";	  
  document.getElementById("link_2_end").innerHTML = "Watch here" ;
}
