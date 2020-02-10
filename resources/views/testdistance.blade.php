

<form method="post" action="{{url('/distance')}}">
    @csrf
    {{--@foreach ($sand as $sand1)--}}
lat 1 : <input type="text" value="{{$sand[0]->lat}}" id="lat1" name="lat">
lng 1 : <input type="text" value="{{$sand[0]->lng}}" id="lon1" name="lng">
lat 2 : <input type="text" value="{{$masnod[0]->lat}}" id="lat2" name="lat">
lng 2 : <input type="text" value="{{$masnod[0]->lng}}" id="lon2" name="lng">

<button type="submit" onclick="getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2)">calc</button>
    {{--@endforeach--}}
</form>

<script>

    function deg2rad(deg) {
        return deg * (Math.PI/180);
    }


    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {

         lat1 = document.getElementById('lat1').value;
         lat2 = document.getElementById('lat2').value;
         lon1 = document.getElementById('lon1').value;
         lon2 = document.getElementById('lon2').value;

        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1);
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);
        var c = 2 * Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
        var d = R * c; // Distance in km
        alert(d);
        var factor = (d*3.5)+(d*3.5*0.2);
alert(factor);


    }

</script>
