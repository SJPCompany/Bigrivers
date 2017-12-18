$(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var name = $(e.relatedTarget).data('name');
        $.ajax({
            dataType: 'json',
            url : baseurl + "/performance/getArtist/",
            data: {artist_name: name},
            beforeSend: function(jqXHR, settings) {
                console.log(settings.url);
            },
            success: function(response) {
                console.log(response);
                $('.artist').html("Name: " + response.name + "<br>" +  "Description: " + response.description + "<br>" +
                    "Website: " + response.website + "<br>" + "Youtube: " +  response.youtube + "<br>" +
                "Facebook: " + response.facebook + "<br>" + "Twitter: " + response.twitter);
            }
        });
    });
});