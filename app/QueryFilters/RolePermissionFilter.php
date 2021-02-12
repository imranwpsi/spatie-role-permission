<?php


namespace App\QueryFilters;


use Faisal50x\QueryFilter\QueryFilter;

class RolePermissionFilter extends QueryFilter
{
    /**
     * @param $query
     * @param string|null $role_id
     * @return mixed
     */
    public function roleId($query, int $role_id = null) {
        if (is_null($role_id)) {
            return $query;
        }
        return $query->whereId($role_id);
    }
}
