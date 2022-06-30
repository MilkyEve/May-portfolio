import turtle
import random

speed = 3
score = 0
Ecar_speed = 0.1

wn = turtle.Screen()
wn.title("Pong")
wn.bgcolor("black")
wn.setup(width=800, height=600)
wn.tracer(0)

# Track border left
borderLeft = turtle.Turtle()
borderLeft.speed(0)
borderLeft.shape("square")
borderLeft.color("white")
borderLeft.shapesize(stretch_wid=30,stretch_len=.5)
borderLeft.penup()
borderLeft.goto(-200, 0)
borderLeft.position = -300

# Track border right
borderRight = turtle.Turtle()
borderRight.speed(0)
borderRight.shape("square")
borderRight.color("white")
borderRight.shapesize(stretch_wid=30,stretch_len=.5)
borderRight.penup()
borderRight.goto(200, 0)
borderRight.position = 300

# Car
car = turtle.Turtle()
car.speed(0)
car.shape("square")
car.color("green")
car.shapesize(stretch_wid=3,stretch_len=2)
car.penup()
car.goto(0, -240)

# Enemy cars
Ecar = turtle.Turtle()
Ecar.speed(0)
Ecar.shape("square")
Ecar.color("red")
Ecar.shapesize(stretch_wid=3,stretch_len=2)
Ecar.penup()
Ecar.goto(0, 400)

# # Pen
pen = turtle.Turtle()
pen.speed(0)
pen.shape("square")
pen.color("white")
pen.penup()
pen.hideturtle()
pen.goto(-300, 250)
pen.write("Score: 0", align="center", font=("Courier", 24, "normal"))

def car_left():
    x = car.xcor()
    x += -20
    car.setx(x)

def car_right():
    x = car.xcor()
    x -= -20
    car.setx(x)


# Keyboard bindings
wn.listen()
wn.onkeypress(car_left, "a")
wn.onkeypress(car_right, "d")

# Main game loop
while True:
    #spawn location Ecar
    x = random.randint(-180,180)
    
    Ecar.sety(Ecar.ycor() - Ecar_speed)

        # bottum and Ecar collisions
    if Ecar.ycor() < -240:
        score += 1
        Ecar_speed += 0.001
        Ecar.goto(x, 240)
        pen.clear()
        pen.write("Score: {}".format(score), align="center", font=("Courier", 24, "normal"))


    #car variables
    tl = Ecar.xcor()-22
    tr = Ecar.xcor()+22

    cl = car.xcor()-22
    cr = car.xcor()+22

    #Car and Ecar collision
    if ((tl >= cl and tl <= cr) or (tr >= cl and tr <= cr)) and Ecar.ycor() <= -180:
        Ecar_speed = 0
        pen.clear()
    else:
        Ecar_speed = 0.1


    wn.update()

