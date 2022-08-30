<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Consulta Pública Registrada</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>El Instituto de Planeación Democrática y Prospectiva agradece tu participación.</p>
    <p>Tu consulta quedo registrada y esta lista para ser valorada.</p>
    <br>
    <p>
        Recuerda que en cualquier momento puedes dar seguimiento al progreso de valoración a través de
        <a href="https://www.consultas.cdmx.gob.mx/">www.consultas.cdmx.gob.mx</a>
    </p>
    <h4>TU FOLIO DE SEGUIMIENTO ES:</h4>
    <h1>
        {{ $details['folio'] }}
    </h1>
    <a href="{{ $details['consulta_folio_url'] }}">Click aqui para dar seguimiento</a>
    <br><br>
    <p>IPDP Instituto de Planeación Democrática y Prospectiva</p>
    S. Lorenzo 712, Primer Piso, Col del Valle Sur, Benito Juárez, 03100 Ciudad de México, CDMX
</body>
</html>