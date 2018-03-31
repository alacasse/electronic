Hi and thank you for looking at my script.

I had to fix the ElectronicItems and ElectronicItem classes, there were some typos that prevented me to use them properly.

- ksort returns a boolean, I had to change the ElectronicItems::getSortedItems() function to return the actual sorted array.
- ElectronicItem::$types was private so it wasn't possible to access it from ElectronicItems
- In ElectronicItem::type property is private so I changed ElectronicItems::getItemsByType() to use ElectronicItem::getType().
- ElectronicItems::getItemsByType() wasn't returning the array of items, so I made it return it.

I could have done many things to make the script nicer and more "OOP", but I deemed it sufficiently good to meet the requirements.

Cheers,
André