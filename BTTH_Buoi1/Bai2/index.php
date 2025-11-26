<?php
// Đọc toàn bộ nội dung file
$raw = file_get_contents("Quiz.txt");

// Tách dòng
$lines = array_map('trim', explode("\n", $raw));

$questions = [];
$i = 0;

while ($i < count($lines)) {

    if ($lines[$i] === "") { 
        $i++; 
        continue; 
    }

    // Câu hỏi
    $question = $lines[$i++];

    // Đáp án
    $A = $lines[$i++];
    $B = $lines[$i++];
    $C = $lines[$i++];
    $D = $lines[$i++];

    // ANSWER
    $answerLine = $lines[$i++];
    $answer = trim(str_replace("ANSWER:", "", $answerLine));

    $questions[] = [
        "question" => $question,
        "A" => $A,
        "B" => $B,
        "C" => $C,
        "D" => $D,
        "answer" => $answer
    ];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm </title>
    <style>
        body { font-family: Arial; width: 70%; margin: auto; line-height: 1.6; }
        .question-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .answer {
            color: red;
            font-weight: bold;
            display: none;
        }
        .btn { padding: 10px 20px; font-size: 16px; margin-top: 15px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Bài thi trắc nghiệm </h2>

<?php
$qNum = 1;
foreach ($questions as $q) {

    echo "<div class='question-box'>";
    echo "<h3>Câu $qNum: {$q['question']}</h3>";

    // Tách đáp án đúng thành mảng
    $correctAnswers = array_map('trim', explode(",", $q['answer']));

    // Nếu số đáp án đúng = 1 → radio, ngược lại → checkbox
    $inputType = (count($correctAnswers) == 1) ? "radio" : "checkbox";

    // Tên nhóm cho input
    $name = "question_" . $qNum;

    echo "<label><input type='$inputType' name='{$name}[]' value='A'> {$q['A']}</label><br>";
    echo "<label><input type='$inputType' name='{$name}[]' value='B'> {$q['B']}</label><br>";
    echo "<label><input type='$inputType' name='{$name}[]' value='C'> {$q['C']}</label><br>";
    echo "<label><input type='$inputType' name='{$name}[]' value='D'> {$q['D']}</label><br>";

    echo "<p class='answer'>Đáp án đúng: {$q['answer']}</p>";
    echo "</div>";

    $qNum++;
}

?>

<button class="btn" onclick="showAnswer()">Hiện đáp án</button>

<script>
function showAnswer() {
    // Hiện tất cả đáp án đúng
    document.querySelectorAll(".answer").forEach(a => {
        a.style.display = "block";
    });
    // KHÓA toàn bộ radio và checkbox, không cho chọn nữa
    document.querySelectorAll("input[type='radio'], input[type='checkbox']").forEach(input => {
        input.disabled = true;
    });
}
</script>

</body>
</html>
