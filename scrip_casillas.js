let map;
let meterStarted = false;
let startPosition;
let distanceTraveled = 0;
const valorFijo = 10000; // Valor fijo de 10,000
const porcentajeCargoPorKilometro = 0.05;

function iniciarMap() {
    var mapOptions = {
        center: { lat: 40.712776, lng: -74.005974 },
        zoom: 14,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    map.addListener("click", function (e) {
        if (!meterStarted) {
            startPosition = e.latLng;
            meterStarted = true;
        } else {
            const endPosition = e.latLng;
            const distance = google.maps.geometry.spherical.computeDistanceBetween(startPosition, endPosition);
            distanceTraveled += distance;
            const cargoPorKilometro = distanceTraveled / 1000 * valorFijo * porcentajeCargoPorKilometro;
            const valorCargo = parseFloat(document.getElementById("valor-cargo").value) || 0;
            document.getElementById("valor-cargo").value = `${cargoPorKilometro.toFixed(2)} COP`;

            const totalSinCargo = parseFloat(document.getElementById("valor-fijo").value) || 0;
            const totalConCargo = totalSinCargo + valorCargo;
            document.getElementById("total").value = `${totalConCargo.toFixed(2)} COP`;

            startPosition = endPosition;
        }
    });
}

function realizarPago() {
    // Puedes agregar aquí la lógica para realizar el pago si es necesario
}


