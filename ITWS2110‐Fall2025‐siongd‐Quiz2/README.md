Dana Siong Sin
ITWS-2110 Quiz 2
README
*I was unable to make a new Azure VM because I have reached the max.

3.1. Any design decisions that you took in completing this quiz.
I kept the design of my website very simple. I used a basic font from Google Fonts: https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap
I also however, I made more decisions on the non-user facing side. I created the database based on the document and organized my php files based on references online.

3.2. Describe how you would handle a situation where a user came to the site for the very first time and no database existed (Think install)
If no database existed after install, that should be the first thing that the site does in the background. Then, the user would probably need to be directed to create an account.

3.3. How could you add functionality to prevent duplicate entries for the same project?
I would add another if statement in the project.php file so check this. I would query the database to see if the project existed and if the count is greater than 0, that means there already exists an entry, so I would not proceed with adding.

3.4. Suppose you want to include functionality to let people vote on the final in-class project presentations.
3.4.1. What additional table(s) will you include to support this?  
3.4.2. How will you structure the data in these table(s)? 3.4.3. How could you add functionality to prevent users from submitting a vote to their own project?
I would create a votes table that includes the project ID as the primary key and another column would be the user ID. I would add rows to the table each time a user votes for a project. In order to prevent users from voting for their own project, I would query the database to check for which project they are on before adding the row to the table. If they are on the project that they are casting the vote for, then I would not proceed with adding the row.