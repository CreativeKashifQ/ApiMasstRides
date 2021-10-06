window.onload = function() {
    const mapOption = {
        lat: 33.68478965000003,
        lng: 72.98825861600002,
        zoom: 15,
        minZoom: 3,
        maxZoom: 20,
        divID: "map",
        gestureHandling: true
    };
    userMap = TPLMaps.map.initMap(mapOption);
    // $("form").submit(function() {
    //     return false;
    // }); //prevent refreshing page on enter

    var myCallback = function(data) {
        // console.log(data);
        Livewire.emit('SenderAddress',data.value);
        document.getElementById('locationTpl').value = data.value;
    };

    var myCallbacktwo = function(data) {
        // console.log(data);
        Livewire.emit('RecipientAddress',data.value);
        document.getElementById('locationTpltwo').value = data.value;

    };


    TPLMaps.widget.searchAutocomplete(document.getElementById('divSearch'), {
        extentSearch: true,
        map: userMap,
        callback: myCallback
    });

    TPLMaps.widget.searchAutocomplete(document.getElementById('divSearchtwo'), {
        extentSearch: true,
        map: userMap,
        callback: myCallbacktwo
    });



    //add bootstrap styling on textbox
    // $("#txtSearch").toggleClass("form-control");
};

function showHideRightPanel() {
    var rightPanelRight = parseFloat($("#cover").css("right").replace("px", ""));
    var rightPanelWidth = $("#cover").css("width");

    if (rightPanelRight != 0) {
        $("#cover").css("right", "0%");
        $("#arrow-btn").css("transform", "rotate(0deg)");
    } else {
        $("#cover").css("right", "-" + rightPanelWidth);
        $("#arrow-btn").css("transform", "rotate(180deg)");
    }
}

// function Hello(map) {
//     alert(map);
//     alert("Bingo")
// }
