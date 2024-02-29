function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    sendLocation(latitude, longitude)
    console.log("Latitude: " + latitude);
    console.log("Longitude: " + longitude);

    // Perform any desired operations with the latitude and longitude values here
}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            console.log("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            console.log("An unknown error occurred.");
            break;
    }
}

function sendLocation(latitude, longitude) {
    var data = {
        latitude: latitude,
        longitude: longitude
    };

    $.ajax({
        url: '/site/change-map',
        type: 'GET',
        dataType: 'json',
        data: data,
        contentType: 'application/json',
        success: function (response) {
            console.log('Location sent successfully. ' + response);
            console.log(response)
            // Handle the response from the server if needed
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('Failed to send location. Error:', errorThrown);
            // Handle the error if needed
        }
    });
}

// Call the getLocation function to start retrieving the location
getLocation();
