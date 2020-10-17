<?php

namespace School\Service\Student\Report;

use School\Model\Student;

class StudentReportCSMBStrategy implements StudentReportStrategyInterface
{
    public function getReport(Student $student): string
    {
        // $xmlEncoder = new XmlEncoder('realty-feed');
        // $normalizer = new CustomNormalizer();
        // $serializer = new Serializer(array($normalizer),array($xmlEncoder));
        // $output = $serializer->serialize($objectData, 'xml');
        
        return "xml not implemented";
    }
}
