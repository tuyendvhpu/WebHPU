<html>
  <head>
    <script src="https://www.google.com/jsapi"
        type="text/javascript"></script>
    <script type="text/javascript">
      google.load("search", "1");

      // Call this function when the page has been loaded
      function initialize() {
        var searchControl = new google.search.SearchControl();
        searchControl.addSearcher(new google.search.WebSearch());
        searchControl.addSearcher(new google.search.NewsSearch());
        searchControl.draw(document.getElementById("searchcontrol"));
      }
      google.setOnLoadCallback(initialize);
    </script>

  </head>
  <body>
    <div id="searchcontrol"></div>
  </body>

</html>