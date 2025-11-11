Dana Siong Sin
Lab 6 README

For this lab, I had a hard time setting up Apache to view my PHP file. It took a long time to work through the Intro to ITWS instructions on setting up the Azure VM
and connecting to GitHub. Eventually I got it and was able to view my PHP file. I used the lecture notes to help refresh my memory on PHP and understand how to do
Part 2 of the lab. 

Questions: 
1) Explain what each of your classes and methods does, the order in which methods are invoked, and the flow of execution after one of the operation buttons has been clicked.
I wrote 3 more classes to perform subtract, multiply, and divide functions. Each class has an operate() and getEquation(). operate() performs the actual computation and getEquation() prints out the full equation. getEquation() executes first after a button is clicked. Then it called operate() to show the result.

2) Also explain how the application would differ if you were to use $_GET, and why this may or may not be preferable.
From my research online, it seems like POST is more preferable when submitting new resources. If we were to use GET, we would have to implement something like this: $o1 = $_GET['op1'];

3) Finally, please explain whether or not there might be another (better +/-) way to determine which button has been pressed and take the appropriate action
We could try using Javascript to implement different operator buttons by accessing attributes using document.getElementById. This is something like what we did in the Intro class.