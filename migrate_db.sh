echo "Please enter old database to migrate: "
read old_db 
echo "Migrating: $old_db"

## insert products, sections and section_types
php artisan migrate:products $old_db
php artisan migrate:section-types $old_db
php artisan migrate:sections $old_db

## setup relationship between products and sections
php artisan migrate:product-section $old_db 

## insert notification groups
php artisan migrate:notification-groups $old_db

## promotions migration
php artisan migrate:promotions $old_db

## billing migration
php artisan migrate:billing $old_db

## migrate users - commented out because takes 10+seconds to run for 5k users
#php artisan migrate:users $old_db
#php artisan migrate:users-address $old_db
