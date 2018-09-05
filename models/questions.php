<?php

    function getQuestions($templateId){
        global $db;
        $sql = "SELECT questions.QuestionID, QuestionText FROM template_questions INNER JOIN questions on template_questions.QuestionID = questions.QuestionID WHERE TemplateID = :templateId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':templateId', $templateId);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;

    }