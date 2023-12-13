<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рисование div</title>
    <style>
        .drawnDiv {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: red;
        }
    </style>
</head>
<body>
<div id="canvas" style="position: relative; width: 25%; height: 25vh; border: 1px solid black;"></div>
<script>
    function drawDiv(x, y, color) {
        var canvas = document.getElementById("canvas");

        if (x >= 0 && y >= 0 && x + 50 <= window.innerWidth && y + 50 <= window.innerHeight) {
            var newDiv = document.createElement("div");

            newDiv.style.left = x + "px";
            newDiv.style.top = y + "px";
            newDiv.style.backgroundColor = color;
            newDiv.className = "drawnDiv";

            canvas.appendChild(newDiv);
        } else {
            alert("Координаты выходят за пределы экрана!");
        }
    }
    drawDiv(55, 2, "red");
</script>
</body>
</html>
