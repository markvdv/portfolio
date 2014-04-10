<?php

namespace Src\Data;

use Src\Entities\Project;

class ProjectDAO extends DAO {

    public static function getAll() {
        $stmt=parent::getAll('project');
/*        $sql = "SELECT * FROM project";
        $stmt = parent::execPreppedStmt($sql);*/
        $resultSet = $stmt->fetchall();
        $arr = array();
        foreach ($resultSet as $result) {
            $project = new Project($result['id'], $result['naam'],$result['url'], $result['imgPath'], $result['srcPath'], $result['omschrijving']);
            $arr[] = $project;
        }
        return $arr;
    }

}
