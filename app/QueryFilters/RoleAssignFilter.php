<?php


namespace App\QueryFilters;


use Faisal50x\QueryFilter\QueryFilter;

class RoleAssignFilter extends QueryFilter
{
    /**
     * @param $query
     * @param string|null $user_id
     * @return mixed
     */
    public function userId($query, int $user_id = null) {
        if (is_null($user_id)) {
            return $query;
        }
        return $query->whereId($user_id);
    }
}
