<?php
require '../admin/quizzes.php';
?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-lg-3 py-md-3">
    <?php if($action=='update'): ?>
        <?php if(isset($_GET["success"]) && $_GET["success"]=='true'): ?> 
            <div class="alert alert-success" role="alert">
                A quiz was updated successfully!
            </div>
        <?php  elseif(isset($_GET["success"]) && $_GET["success"]=='false'): ?>
            <div class="alert alert-danger" role="alert">
                A quiz was'not updated!
            </div>
        <?php else: ?> 
        <h1>Update a quiz 👷 </h1>
        <?php endif; ?> 
        <form action="/admin/update.php" method="post" id="UpdateQuiz" class="form form-update">
            
            <div class="mb-3">
                <label class="form-label">Question</label>
                <input value="<?php echo $quiz_row["question"]; ?>" type="textarea" name="question" class="form-control" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Answer1</label>
                <input value="<?php echo $quiz_row["answer1"]; ?>" type="textarea" name="answer1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Answer2</label>
                <input value="<?php echo $quiz_row["answer2"]; ?>" type="textarea" name="answer2" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Answer3</label>
                <input value="<?php echo $quiz_row["answer3"]; ?>" type="textarea" name="answer3" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Answer4</label>
                <input value="<?php echo $quiz_row["answer4"]; ?>" type="textarea" name="answer4" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Right answer</label>
                <select name="right_answer" id="select" class="form-select" aria-label="Default select example">
                    <option value="<?php echo $quiz_row["right_answer"] ?>"><?php echo $quiz_row["right_answer"] ?></option>
                    
                    <?php for($i=1; $i<=4; $i++): ?>
                        <?php if($i == $quiz_row["right_answer"]) continue; ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <input type="hidden" name="question_id" value="<?php echo $quiz_row["id"]; ?>">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php elseif($action=='delete'): ?>
        <h1>Quizzes - delete</h1>
    <?php elseif($action=='add'): ?>
        <?php if(isset($_GET["success"]) && $_GET["success"]=='true'): ?> 
            <div class="alert alert-success" role="alert">
                A quiz was added successfully!
            </div>
        <?php  elseif(isset($_GET["success"]) && $_GET["success"]=='false'): ?>
            <div class="alert alert-danger" role="alert">
                A quiz was'not added!
            </div>
        <?php else: ?> 
        <h1>Add a quiz 👷 </h1>
        <?php endif; ?> 
        <form action="/admin/add.php" method="post" id="AddQuiz" class="form form-add">
          <div class="mb-3">
              <label class="form-label">Question</label>
              <input type="textarea" name="question" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Answer1</label>
              <input type="textarea" name="answer1" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Answer2</label>
              <input  type="textarea" name="answer2" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Answer3</label>
              <input type="textarea" name="answer3" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Answer4</label>
              <input  type="textarea" name="answer4" class="form-control" required>
          </div>
          <div class="mb-3">
              <label for="select" class="form-label">Right answer</label>
              <select name="right_answer" id="select" class="form-select" aria-label="Default select example">
                  <?php for($i=1; $i<=4; $i++): ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php endfor; ?>
              </select>
          </div>
          <input type="hidden" name="question_id" value="<?php echo $quiz_row["id"]; ?>">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </form>
    <?php else: ?>
        <?php if ($quizzes->num_rows > 0):  ?>
            <h1 class="">Quizzes</h1>
            <table class="table quizzes">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer1</th>
                    <th scope="col">Answer2</th>
                    <th scope="col">Answer3</th>
                    <th scope="col">Answer3</th>
                    <th scope="col">Right answer</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1; ?>
                    <?php while($row = $quizzes->fetch_assoc()) : ?>
                        <tr>
                            <th scope="row"><?php echo $index?></th>
                            <td><?php echo $row["question"]?></td>
                            <td><?php echo $row["answer1"]?></td>
                            <td><?php echo $row["answer2"]?></td>
                            <td><?php echo $row["answer3"]?></td>
                            <td><?php echo $row["answer4"]?></td>
                            <td><?php echo $row["right_answer"]?></td>
                            <td >
                                <a class="text-dark px-3 py-3" href="?page=quizzes&action=update&id=<?php echo $row["id"] ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a  class="text-dark px-3 py-3" href="?page=quizzes&action=delete&id=<?php echo $row["id"] ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                </tbody>
        </table>
        <a class="btn btn-primary" href="/admin?page=quizzes&action=add">Add quiz</a>
        <?php else: ?>
            <h1>No result</h1>
            <a class="my-3 btn btn-primary" href="/admin?page=quizzes&action=add">Add quiz</a>
        <?php endif ?>
    <?php endif; ?>
</div>