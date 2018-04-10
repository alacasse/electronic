Hi and thank you for looking at my script. 

I had to fix the ElectronicItems and ElectronicItem classes, there were some typos that prevented me to use them properly.

- ksort returns a boolean, I had to change the ElectronicItems::getSortedItems() function to return the actual sorted array.
- ElectronicItem::$types was private so it wasn't possible to access it from ElectronicItems
- In ElectronicItem::type property is private so I changed ElectronicItems::getItemsByType() to use ElectronicItem::getType().
- ElectronicItems::getItemsByType() wasn't returning the array of items, so I made it return it.

It now runs on PHP 7.2. I think the minimum php version to run it will be 7.1, because of PHPUnit 7.

To install:

- unzip 
- run composer install

To run, use the following commands:

- php application.php app:console-price
- php application.php app:sort-items
- php application.php app:run-tests

I could have done more tests and make the app generally nicer but I'm out of time.
 
Cheers,
André