
 Clone this repository to your local machine:
   ```bash
   git clone https://github.com/Themmythorpe/riskadvisorassessment.git

Navigate into the project directory:

cd riskadvisorassessment

npm install
npm run dev
composer install


cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve

Testing
php artisan test
php artisan migrate:fresh --seed


Brief Description about the app

There is a Landing page that Contains Links for Client to Get Insurance Quotes, Register and Login

/consumer_form
Leads the Client to the Form where they can submit their information
The form is divided into 3 stages for good user experience and not to bore clients from too much information on a page. The first stage gets the personal information of the client. The second stage gets the adress information of the user and the third stage gets the product information a client would love to get quotes for.

/register
this form is the registration page to become an authenticated user

/login
this form is the login form to be authenticated 

/dashboard
this is an authenticated page that has three tabs
the first tab contains the list of submissions from consumers that wish to get quotes in the latest order
the second tab contains list of consumers that has registered on the app
the third tab contains list of available products for quotes


Tables Models and Relationships
consumers:

This table stores information about consumers.
It contains columns such as id, first_name, last_name, email, phone, contact_preference, street_address, ste_apt, city, state, zip_code, and timestamps.
The id column serves as the primary key.
It has a one-to-many relationship with the submissions table through the consumer_id foreign key.


submissions:

This table stores information about form submissions.
It contains columns such as id, consumer_id, form_completed, and timestamps.
The id column serves as the primary key.
It has a foreign key constraint referencing the id column of the consumers table (consumer_id), establishing a one-to-many relationship with the consumers table.
It also has a one-to-many relationship with the products table through the submission_product pivot table.

products:

This table stores information about products.
It contains columns such as id, name, description, image, and timestamps.
The id column serves as the primary key.
It has a many-to-many relationship with the submissions table through the submission_product pivot table.
submission_product:

This table represents the pivot table for the many-to-many relationship between submissions and products.
It contains columns such as id, submission_id, product_id, and timestamps.
The id column serves as the primary key.
It has foreign key constraints referencing the id columns of the submissions table (submission_id) and the products table (product_id).
This table facilitates the many-to-many relationship between submissions and products, allowing a submission to be associated with multiple products and vice versa.

Development Time

Backend Laravel : Tests and Implementation took about 4 hours to develop

Frontend Vue: Took about 3 hours to develop since i rode on the jetstream inertia platform
