<a name="readme-top"></a>

<div align="center">
    <h3 align="center">Backend Developer coding test</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-test">About the test</a>
    </li>
    <li>
      <a href="#requirements">Requirements</a>
      <ul>
        <li><a href="#product-specifications">Product specifications</a></li>
        <li><a href="#api-requirements">API Requirements</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#bonus-points">Bonus points</a>
    </li>
    <li>
      <a href="#application-set-up">Application Setup</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE TEST -->
## About the test

You're tasked to create a simple REST web service application for a fictional e-commerce business using Laravel.

You need to develop the following REST APIs:

* Products list
* Product detail
* Create product
* Update product
* Delete product

<!-- REQUIREMENTS -->
## Requirements

### Product specifications

A product needs to have the following information:

* Product name
* Product description
* Product price
* Created at
* Updated at

### API requirements

* Products list API
    * The products list API must be paginated.
* Create and Update product API
    * The product name, description, and price must be required.
    * The product name must accept a maximum of 255 characters.
    * The product price must be numeric in type and must accept up to two decimal places.
    * The created at and updated at fields must be in timestamp format.

Others:
* You are required to use MYSQL for the database storage in this test.
* You are free to use any library or component just as long as it can be installed using Composer.
* Don't forget to provide instructions on how to set the application up.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* Git
* Composer
* PHP ^8.0.2
* MySQL

### Installation

* Create a new repository under your account named `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Push your code to the new repository.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- BONUS POINTS -->
## Bonus points

#### For bonus points:

* Cache the response of the Product detail API. You are free to use any cache driver.
* Use the Service layer and Repository design patterns.
* Create automated tests for the app.

#### Answer the question below by updating this file.

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A:   When gathering details for implementing additional features in our e-commerce app, it's essential to start with a thorough understanding and gathering of the requirements. By documenting the specific functionalities needed for the "featured products" section, like the ability to mark products as featured, manage their status, and display them prominently on the frontend. Defining user stories or use cases will help clarify how different users, such as administrators and customers, will interact with this feature. Also, we need to gather design specifications to ensure that backend development aligns seamlessly with frontend expectations, especially regarding how featured products will be presented visually.

:    Additionally, it's important to identify necessary modifications to the database schema, such as adding fields to indicate featured type, status or timestamps for when products were highlighted. Considering performance early on involves discussing scalability needs and implementing efficient strategies for database querying and caching. We must also determine integration points with existing systems or APIs, such as user authentication services or product management tools. Lastly, estimating timelines and resource requirements for development, testing, and deployment phases, while considering dependencies and constraints that could impact project delivery. This comprehensive approach will ensure a clear understanding of the project scope and facilitate effective collaboration among stakeholders and development teams throughout the implementation process.

#### Application set up.
* Step 1: Start XAMPP
    * Open XAMPP Control Panel.
    * Start Apache and MySQL.
* Step 2: Clone the Repository
    * Open your terminal.
    * Navigate to htdocs file of xampp. Go to where you installed xampp that's where you going to clone the project under htdocs folder. Mine is C:\xampp\htdocs
    * Run the command: git clone https://github.com/kurt-lo/russelkurt-nolasco-coding-test.git
* Step 3: Open the Project on your preffered IDE, mine is VS Code.
    * (optional if you're terminal is not in the project yet)
    * cd russelkurt-nolasco-coding-test
    * code .
* Step 4: Install Composer Dependencies
    * In the terminal, run: composer install
* Step 5: Configure Environment Variables
    * Create a .env file:
    * Copy all of the content of .env.testing and paste it in the newly created .env file.
    * Open .env file in VS Code and configure your database connection: DB_CONNECTION=mysql
                                                                        DB_HOST=127.0.0.1
                                                                        DB_PORT=3306
                                                                        DB_DATABASE=products_db
                                                                        DB_USERNAME=root
                                                                        DB_PASSWORD=
* Step 6: Generate Application Key
    * In the terminal, run: php artisan key:generate
* Step 7: Serve the Application
    * In the terminal, run: php artisan serve
    * Open the URL given in the terminal, for example, http://127.0.0.1:8000.
    * You should see "Hello World Products".
* Step 9: Migrate the Database
    * In the terminal, run: php artisan migrate.
    * If prompted with "Would you like to create it? (yes/no)", type yes to create the database and run the migrations.
* Step 10: Update Testing Environment
    * Copy the application key or the APP_KEY from .env file.
    * Paste the APP_KEY into .env.testing file.











