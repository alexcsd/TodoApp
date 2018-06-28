import React from 'react';
import { Row, Col, Button } from 'reactstrap';

const TodoItem = ({ todo, handleDelete }) => {
    return (
        <Row>
            <Col xs='12' md='8'>
                <h3>{todo.title}</h3>
                <p>{todo.details}</p>
            </Col>
            <Col xs={6} md={4}>
                <Button onClick={handleDelete} value={todo._id} color="danger" size="xsmall">Delete</Button>
            </Col>
        </Row>
    );
};

export default TodoItem;
                                                                                                                                                                                                                                                                                                                                                