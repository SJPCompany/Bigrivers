$(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var name = $(e.relatedTarget).data('name');
        $.ajax({
            dataType: 'json',
            url : baseurl + "/performance/getArtist/",
            data: {artist_name: name},
            success: function(response) {
                $('.artist').html("Naam: " + response.name + "<br>" +  "beschrijfing: " + response.description + "<br>" +
                    "Website: " + response.website + "<br>" + "Youtube: " +  response.youtube + "<br>" +
                "Facebook: " + response.facebook + "<br>" + "Twitter: " + response.twitter);
            }
        });
    });
});