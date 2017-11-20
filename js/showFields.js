$(document).ready(function(){
    $('#SelectLinkType').on('change', function() {
      if ( this.value == 'internal')
      //.....................^.......
      {
        $("#internal").show();
      }
      else
      {
        $("#internal").hide();
      }

      if ( this.value == 'external')
      //.....................^.......
      {
        $("#external").show();
      }
      else
      {
        $("#external").hide();
      }

      if ( this.value == 'file')
      //.....................^.......
      {
        $("#file").show();
      }
      else
      {
        $("#file").hide();
      }
    });
});