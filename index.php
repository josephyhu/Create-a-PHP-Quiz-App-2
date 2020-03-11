<?php
include 'inc/quiz.php';
include 'inc/header.php';
?>
    <div class="container">
      <div id="quiz-box">
        <?php
        if (!empty($toast)) {
            echo "<p>$toast</p>";
        }
        ?>
        <?php if ($show_score == false) { ?>
        <p class="breadcrumbs">Question <?php echo count($_SESSION['used_indexes']); ?> of <?php echo $totalQuestions; ?></p>
        <p class="quiz">What is <?php echo $question['leftAdder']; ?> + <?php echo $question['rightAdder']; ?>?</p>
        <form action="index.php" method="post">
          <input type="hidden" name="id" value="<?php echo $index; ?>">
          <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>">
          <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>">
          <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>">
        </form>
        <?php } else { ?>
        <p>You got <?php echo $_SESSION['totalCorrect']; ?> of <?php echo $totalQuestions; ?> correct!</p>
        <?php } ?>
      </div>
    </div>
<?php include 'inc/footer.php'; ?>
