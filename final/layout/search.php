<?php include('header.php');?>

<div class="search-container">
        <div class="search-header">
            <h2>Buscar Propiedades</h2>
        </div>
        <form action="#" method="GET" class="search-form">
            <div class="form-group">
                <label for="keyword">Keyword:</label>
                <input type="text" id="keyword" name="keyword" placeholder="Enter keyword">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter location">
            </div>
            <div class="form-group">
                <label for="property-type">Property Type:</label>
                <select id="property-type" name="property-type">
                    <option value="">Any</option>
                    <option value="apartment">Apartment</option>
                    <option value="house">House</option>
                    <option value="land">Land</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="min-price">Min Price:</label>
                <input type="text" id="min-price" name="min-price" placeholder="Min Price">
            </div>
            <div class="form-group">
                <label for="max-price">Max Price:</label>
                <input type="text" id="max-price" name="max-price" placeholder="Max Price">
            </div>
            <div class="form-group">
                <input type="submit" value="Search">
            </div>
        </form>
    </div>

<?php include('footer.php');?>