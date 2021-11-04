<h1>Liste des articles</h1>
 
    <div >
        <div>
            <a href="#">
                <img src="images/<?php echo $article['photo']; ?>"  width="170px" height="170px"  alt="" />
            </a>
            <div >
                <a href="#" > <?php echo number_format($articles['prix'],2,',',''); ?> </a>
            </div>
            <a href="articles/detail/<?=$articles['idproduit']; ?>" >Detail</a>
            
            <a  href="#<?=$articles['idproduit']; ?>">add</a>
        </div>
    </div>
 