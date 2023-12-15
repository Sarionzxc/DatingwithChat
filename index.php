<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.heartbeatloader {
  position: absolute;
  width: 30vmin;
  height: 30vmin;
  z-index: -2;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.svgdraw {
  top: 30%;
  left: 26%;
  position: absolute;
  width: 50%;
  height: 50%;
  transform: scale(1.4);
  z-index: 3;
}

.path {
  stroke: rgba(0, 0, 0, 0.95);
  stroke-width: 4;
  stroke-dasharray: 1000px;
  stroke-dashoffset: 1000px;
  animation: draw 1.5s infinite forwards normal linear;
  animation-delay: 0.1s;
  position: relative;
}



@keyframes draw {
  to {
    stroke-dashoffset: 0;
  }
}

.innercircle {
  position: absolute;
  top: 17%;
  left: 100.5%;
  transform: translate(-50%, -50%) scale(1.2);
  width: 160%;
  height: auto;
  z-index: 1;
  opacity: 0.97;
  animation: innerbeat 1.5s infinite linear forwards;
}

.innercircle:before,
.innercircle:after {
  position: absolute;
  content: "";
  left: 25%;
  top: 0;
  width: 25%;
  height: auto;
  padding-bottom: 40%;
  background: rgb(225, 95, 95);
  border-radius: 50px 50px 0 0;
  transform: rotate(-45deg);
  transform-origin: 0 100%;
}

.innercircle:after {
  left: 0;
  transform: rotate(45deg);
  transform-origin: 100% 100%;
}

@keyframes innerbeat {
  0% {
    transform: translate(-50%, -50%) scale(1.2);
  }

  10% {
    transform: translate(-50%, -50%) scale(1.2);
  }

  50% {
    transform: translate(-50%, -50%) scale(1.3);
  }

  60% {
    transform: translate(-50%, -50%) scale(1.25);
  }

  75% {
    transform: translate(-50%, -50%) scale(1.3);
  }
}

.outercircle {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: rgba(230, 92, 92, 0.774);
  box-shadow: 0 0 30px 0px #000;
  position: absolute;
  z-index: -1;
  opacity: 0.7;
  top: 0;
  left: 0;
  transform: scale(1.2);
  animation: outerbeat 1.5s infinite linear forwards;
}

@keyframes outerbeat {
  0% {
    transform: scale(1.2);
  }

  10% {
    transform: scale(1.2);
  }

  50% {
    transform: scale(1.3);
  }

  60% {
    transform: scale(1.25);
  }

  75% {
    transform: scale(1.3);
  }
}
</style>
</head>
    <div class="heartbeatloader">
            <svg class="svgdraw" width="100%" height="100%" viewBox="0 0 150 400" xmlns="http://www.w3.org/2000/svg">
                <path class="path" d="M 0 200 l 40 0 l 5 -40 l 5 40 l 10 0 l 5 15 l 10 -140 l 10 220 l 5 -95 l 10 0 l 5 20 l 5 -20 l 30 0" fill="transparent" stroke-width="4" stroke="black"></path>
            </svg>
            <div class="innercircle"></div>
            <div class="outercircle"></div>
        </div>


        <script>
        
        setTimeout(function() {
            document.body.style.opacity = 0;
            setTimeout(function() {
                window.location.replace('login.php');
            }, 1000); 
        }, 5000);
    </script>

  </body>
</html>