# REST API - Slim

## To run the server locally:
Install MAMP on your local machine in order to set up the database. I loaded the database schema into the /data/data_schema which contains all the inserts needed to create the database locally. run these SQL statements on your local machine to upload the necessary data to MySql.

Four tables:
rest_api_data.city
rest_api_data.state
rest_api_data.user
rest_api_data.visits

Once the above is complete, go to 'http://localhost:8888/slim-rest-api/' to start at the homepage of my project.

# Summary
I used the Slim PHP framework to build this API, and MAMP to run the MySql server. 

Notes about the city table: I added a field 'state' in order to perfom the necessary joins with the state table. It was my initial intent to use the Googel Maps API to reverse geocode the latitude and longitude in order to determine the state (as I believe that was your intent in not including the state field), but I reversed that plan for the sake of time.

To test the API I used basic HTML forms, as you will see when you run my program.

Note about the required DELETE endpoint: In my experience I've been trained to stay away from the DELETE Http method because some browsers do not support it. I used a POST endpoint instead.


