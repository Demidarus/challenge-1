<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        window.fetchItemDetails = function(itemId) {
            const detailsId = "details_" + itemId;
            const detailsElement = document.getElementById(detailsId);

            if (detailsElement) {
                detailsElement.innerHTML = 'Loading...';

                fetch('item_details.php?item=' + itemId)
                    .then(response => response.text())
                    .then(data => {
                        detailsElement.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error fetching item details:', error);
                        detailsElement.innerHTML = 'Error loading item details.';
                    });;
            } else {
                console.error('Element with ID ' + detailsId + ' not found');
            }
        }
    });
    </script>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" value="show items" name="submit" />
    </form>
    <?php require '../functions.php'; run(); ?>
</body>

</html>