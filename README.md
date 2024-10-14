# Kedaiku

**Kedaiku** is an online bookstore web application designed to provide a seamless, efficient, and well-organized book shopping experience. This application offers an intuitive interface for users and comprehensive management tools for admins.

## Key Features

### For Users:
- **Browse Books**: Users can view the various available books by category, title, or author.
- **Book Details**: Users can view detailed information about a book, including title, author, publisher, number of pages, price, and description.
- **Shopping Cart**: Users can add books to the cart and proceed to checkout. Users must log in to complete purchases.
- **Registration and Login**: New users need to register to make purchases and access other features.
- **Transaction History**: Users can review their final purchase steps, including subtotal of books and payment details.
- **Payment**: Users who haven’t completed payments will receive notifications and cannot make new purchases until payment is settled.
- **Confirm Receipt of Goods**: After receiving their items, users can confirm that their order has been delivered.
- **Logout**: Users can securely log out of their accounts using the provided logout feature.

### For Admins/Superusers:
- **Dashboard Access**: 
  - Admins/superusers have full access to the application’s dashboard, which provides an overview of store activity. Admins can manage inventory, transactions, and users directly from the dashboard.
- **Dynamic Greeting**: Admins will be greeted with a message based on the time of day:
  - **Good Morning**: for times before 12:00 PM,
  - **Good Afternoon**: for times between 12:00 PM and 3:00 PM,
  - **Good Evening**: for times between 3:00 PM and 6:00 PM,
  - **Good Night**: for times after 6:00 PM.
- **Dashboard Navigation**: The dashboard menu includes:
  - **Home**: Displays a summary of store activities and statistics.
  - **Categories**: Manage the available book categories.
  - **Catalog**: View and manage the book catalog.
  - **Books**: Admins can add, edit, or delete books from the inventory. They can also update the available book stock.
  - **Customers**: Manage registered users of the application.
  - **Transactions**: View and manage user transactions.
  - **Book Shipping**: Monitor and manage book shipments to customers.
  - **Logout**: Admins can securely log out of their accounts.

### Order Management:
Admins can monitor and manage user orders **directly via the web**, without needing manual database access. The order management features include:
  - **View Order Details**: Admins can access and view details of every user order, such as the list of books ordered and the total payment.
  - **Change Transaction Status**: Admins can update transaction statuses, such as changing the status to "Processing," "Shipped," or "Completed." If necessary, admins can also delete transactions.
  - **View and Edit Shipping Address**: Admins can access and modify user shipping information if needed, all **directly via the web**.

### Book Details
The book details managed in the application include the title, author, publisher, number of pages, price, and a brief description of the book. This information helps users select books that match their interests.

### Database Structure
The **Kedaiku** application uses a database structure designed for efficient management of book, transaction, and user data:
- **books**: Stores data on books available in the store.
- **customers**: Stores information of registered users.
- **cart**: Stores data on books added to the shopping cart by users.
- **purchases**: Stores records of completed transactions.
- **province**: Stores shipping region data for books.
- **stock**: Manages and monitors the available stock of books in the store.
- **superuser**: Stores information of admins or users with full access to the application.

### Technologies Used
- **Backend**: PHP
- **Frontend**: Bootstrap (for responsive design)
- **Database**: MySQL

### Conclusion
With **Kedaiku**, users can easily explore and purchase their favorite books, while admins have full control over inventory, orders, and customers via the web.

![admin](https://github.com/user-attachments/assets/20bbb8b7-b7e9-4587-9f9f-4793ca50cdcb)
![user](https://github.com/user-attachments/assets/4a6a3dcc-300c-43ef-82ca-5e3cdb6b1d9a)
![classdiagram](https://github.com/user-attachments/assets/15e3913b-266c-48b5-a7ce-d80601babd62)



