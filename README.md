# Food E-commerce

This project represents a food e-commerce store implemented in PHP and SQL using the procedural programming paradigm in the Master branch and the object-oriented programming paradigm in the php-oop branch.

## Features

- Dynamic content display in various sections, with data fetched from the database.
- Validation of various pages.
- User registration and login forms.
- Shopping cart and checkout functionality.
- PayPal payment integration.
- Order history display.
- User dashboard for data modification.
- Seller dashboard (under development).

## Usage

1. Clone this repository into the `c/xampp/htdocs` directory.
2. Ensure that XAMPP is installed and start the Apache and MySQL servers.
3. Open the browser and go to the `localhost/freshcherry` page.
4. Use the comand line `git checkout php-oop`, then refresh the `localhost/freshcherry` page.
5. Log in as a user using the following credentials:
   - Email: john@doe.com
   - Password: password.
6. To test the payment service, go to the [PayPal Developers](https://developer.paypal.com/) page and follow the instructions to create a sandbox. Use the sandbox data to make a payment.

## Branches

- `Master`: Implementation up to the customer-specific part. In the future, the part related to the administrator will be implemented.
- `php-oop`: Implementation subsequent to the Master. In this branch, login and register functionalities have been implemented using classes. The administrator part is under development and will also be implemented using classes.

## License

The license included in this project is provided with the template used.
