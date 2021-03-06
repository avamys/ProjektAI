var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

var c = canvas.getContext('2d');

var mouse = {
    x: undefined,
    y: undefined
}

var maxRadius = 50;
var minRadius = 0;

var colorArray = [
    '#F2F2F2',
    '#D46896',
    '#33ABC3',
    "#9AC7D9",
    "#F9CBE4"
];

window.addEventListener('resize', function()
{
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    init();
})

window.addEventListener('mousemove', function(event)
{
    mouse.x = event.x;
    mouse.y = event.y;
})

function Circle(x,y,dx,dy,radius)
{
    this.x = x;
    this.y = y;
    this.dx = dx;
    this.dy = dy;
    this.radius = radius;
    this.minRadius = radius;
    this.color = colorArray[Math.floor(Math.random() * colorArray.length)];

    this.draw = function()
    {
        c.beginPath()
        c.arc(this.x,this.y,this.radius,0,Math.PI*2,false);
        c.strokeStyle = this.color;
        c.stroke();
    }

    this.update = function()
    {
        if(this.x + this.radius > innerWidth || this.x - this.radius < 0)
        {
            this.dx = -this.dx;
        }

        if(this.y + this.radius > innerHeight || this.y - this.radius < 0)
        {
            this.dy = -this.dy;
        }

        this.x += this.dx;
        this.y += this.dy;

        // interact
        if(mouse.x - this.x < 50 && mouse.x - this.x > -50 &&
            mouse.y - this.y < 50 && mouse.y - this.y > -50)
        {
            if(this.radius < maxRadius)
            {
                this.radius += 2;
            }
        }
        else if(this.radius > this.minRadius)
        {
            this.radius -= 1;
        }

        this.draw();
    }
}

var circleArray = [];
function init()
{
    circleArray = [];
    for(var i = 0; i < 800; i++)
    {
        var radius = 0;//Math.random() * 3 + 1;
        var x = Math.random() * (innerWidth - radius * 2) + radius;
        var y = Math.random() * (innerHeight - radius * 2) + radius;
        var dx = (Math.random() - 0.5) * 5;
        var dy = (Math.random() - 0.5) * 5;
        circleArray.push(new Circle(x,y,dx,dy,radius));
    }
}

function animate() 
{
    requestAnimationFrame(animate);
    c.clearRect(0,0,innerWidth,innerHeight);
    c.fillStyle = '#1f1e1f';
    c.fillRect(0,0,canvas.width,canvas.height);
    //c.fillStyle = '#ab2f23';
    for(var i = 0; i < circleArray.length; i++)
    {
        circleArray[i].update();
    }
    c.fillStyle = '#ffffff';
    c.font = 0.05 * innerWidth + "px Georgia";
    c.textAlign = 'center';
    c.fillText("APLIKACJE INTERNETOWE", canvas.width / 2, canvas.height/2);
    c.font = 0.025 * innerWidth + "px Georgia";
    c.fillText("PROJEKT", canvas.width / 2, canvas.height/1.5);
}

init();
animate();