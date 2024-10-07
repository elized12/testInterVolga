<?php

/**
 * строит таблицу школьных баллов
 * @param array $arrayStudents отсортированный массив учеников и их баллов 
 * пример ([['Иванов', 'Математика', 5],['Иванов', 'Математика', 4], [Петров, 'Математика', 5]])
)
 * @return void
 */
function createSchoolTable(array $arrayStudents): void
{
    $infoStudetScore = [];

    $allSubjects = [];

    foreach ($arrayStudents as $student) 
    {
        if (empty($infoStudetScore[$student[0]][$student[1]]))
            $infoStudetScore[$student[0]][$student[1]] = 0;

        if (empty($allSubjects[$student[1]]))
            $allSubjects[$student[1]] = 1;

        $infoStudetScore[$student[0]][$student[1]] += $student[2];
    }


    ksort($allSubjects);

    echo '<table class="table table-striped">';
    echo "<thead>";
    echo "<tr>";
    echo '<th scope="col"></th>';

    //вывод заголовка таблицы (название предметов)
    foreach ($allSubjects as $subjectName => $notUsed) 
    {
        echo "<th>" . $subjectName . "</th>";
    }

    echo "</thead>";
    echo "<tbody>";

    //вывод тела таблицы (баллы учеников)
    foreach ($infoStudetScore as $student => $studentSubjectValues) 
    {
        echo "<tr>";

        echo "<th>" . $student . "</th>";

        foreach ($allSubjects as $subjectName => $notUsed) 
        {
            echo "<th>";

            if (!empty($studentSubjectValues[$subjectName])) 
            {
                echo $studentSubjectValues[$subjectName];
            }
            echo "</th>";
        }
    }

    echo "</tbody>";
    echo "</table>";
}

?>

<?php
$data =
    [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
    ];
?>