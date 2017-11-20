$(document).ready(function(){
    $('#SelectInternalType').on('change', function() {
      if ( this.value == 'Events')
      //.....................^.......
      {
        $("#Events").show();
      }
      else
      {
        $("#Events").hide();
      }

      if ( this.value == 'Performances')
      //.....................^.......
      {
        $("#Performances").show();
      }
      else
      {
        $("#Performances").hide();
      }

      if ( this.value == 'Artists')
      //.....................^.......
      {
        $("#Artists").show();
      }
      else
      {
        $("#Artists").hide();
      }

      if ( this.value == 'Page')
      //.....................^.......
      {
        $("#Page").show();
      }
      else
      {
        $("#Page").hide();
      }

      if ( this.value == 'News')
      //.....................^.......
      {
        $("#News").show();
      }
      else
      {
        $("#News").hide();
      }
    });
});