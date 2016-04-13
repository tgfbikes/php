class AddParentIdToKids < ActiveRecord::Migration
  def change
    add_reference :kids, :parent, index: true, foreign_key: true
  end
end
