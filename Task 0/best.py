def best_first_search(graph, start, goal, heuristic):
    
    open_list = [(start, heuristic[start])]
    closed_list = set()
    
   
    came_from = {start: None}
    
    while open_list:
       
        current_node, _ = min(open_list, key=lambda x: x[1])
        open_list = [node for node in open_list if node[0] != current_node]
      
        if current_node == goal:
            path = []
            while current_node:
                path.append(current_node)
                current_node = came_from[current_node]
            return path[::-1] 
        
        
        closed_list.add(current_node)
        
       
        for neighbor, cost in graph[current_node].items():
            if neighbor not in closed_list:
                if not any(node[0] == neighbor for node in open_list):
                    open_list.append((neighbor, heuristic[neighbor]))
                    came_from[neighbor] = current_node
    
    return None


graph = {
    'S': {'A': 40, 'B': 32, 'C': 25},
    'A': {'S': 40, 'D': 35, 'C': 15},
    'B': {'S': 32, 'C': 25},
    'C': {'S': 25, 'A': 15, 'B': 25, 'E': 15, 'F': 20},
    'D': {'A': 35, 'G': 0},
    'E': {'A': 15, 'C': 15, 'G': 0},
    'F': {'C': 20, 'G': 0},
    'G': {'D': 0, 'E': 0, 'F': 0}
}


heuristic = {
    'S': 40,
    'A': 35,
    'B': 32,
    'C': 25,
    'D': 20,
    'E': 15,
    'F': 20,
    'G': 0
}


start_node = 'S'
goal_node = 'G'
path = best_first_search(graph, start_node, goal_node, heuristic)


print("Path from", start_node, "to", goal_node, ":", path)
