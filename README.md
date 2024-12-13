# iPhone-Calculator

Class represents a typical iPhone calculator:

  - Is able to perform addition, subtraction, multiplication and division.
  - Has the concept of the "screen" which would behave like a traditional calculator. 
  - Every time you "press" a button the screen updates (just echo out the current screen state) depending on which button you press.
  - Press + and it then waits for you to press a number button and then if you pressed = it would perform the calculation.
  - And so on...

Example: 

  - $calculator = new Calculator();
  - $calculator->pressNumber(1);
  - // outputs 1
  - $calculator->pressNumber(3);
  - // outputs 13
  - $calculator->add();
  - // outputs 13
  - $calculator->pressNumber(3);
  - // outputs 3
  - $calculator->equals();
  - // outputs 16
